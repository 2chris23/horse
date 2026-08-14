@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @php
            if(is_array($message['message'] )){
            if(isset($message['message'] )){

            $t = $message['message'];
            if(isset($t['sms'])) $message['message']  = $t['sms'];
            if(isset($t['error_message'])) $message['message']  = $t['error_message'];
            }
            }

        @endphp
        {{--
        <div class="alert
                    alert-{{ $message['level'] }}
        {{ $message['important'] ? 'alert-important' : '' }}"
             role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;
                </button>
            @endif
            {!! $message['message'] !!}
        </div>
        --}}
        <script>
            $(window).on('load', function () {

                WarP('', '{!! Funciones::ReemplazarApostrofe($message['message'] ) !!}');
           });
        </script>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
