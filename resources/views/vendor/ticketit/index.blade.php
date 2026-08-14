@extends($master)

@section('title')
    {{ trans('ticketit::lang.index-title') }}
@endsection

@section('content')

{{-- Mis tiquetes --}}
@include('vendor.ticketit.shared.header')

    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>

                    <h2>{{ trans('ticketit::lang.index-my-tickets') }}
                        {!! link_to_route($setting->grab('main_route').'.create', trans('ticketit::lang.btn-create-new-ticket'), null, ['class' => 'btn btn-primary btn-warning pull-right']) !!}
                    </h2>

                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        @include('ticketit::tickets.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottomjs')


    {{--<script src="//cdn.datatables.net/v/bs/dt-{{ Kordy\Ticketit\Helpers\Cdn::DataTables }}/r-{{ Kordy\Ticketit\Helpers\Cdn::DataTablesResponsive }}/datatables.min.js"></script>--}}
    <script>
        $('.table').DataTable({
            processing: false,
            serverSide: true,
            responsive: true,
            pageLength: {{ $setting->grab('paginate_items') }},
            lengthMenu: {{ json_encode($setting->grab('length_menu')) }},
            ajax: '{!! route($setting->grab('main_route').'.data', $complete) !!}',
            language: {
                decimal: "{{ trans('ticketit::lang.table-decimal') }}",
                emptyTable: "{{ trans('ticketit::lang.table-empty') }}",
                info: "{{ trans('ticketit::lang.table-info') }}",
                infoEmpty: "{{ trans('ticketit::lang.table-info-empty') }}",
                infoFiltered: "{{ trans('ticketit::lang.table-info-filtered') }}",
                infoPostFix: "{{ trans('ticketit::lang.table-info-postfix') }}",
                thousands: "{{ trans('ticketit::lang.table-thousands') }}",
                lengthMenu: "{{ trans('ticketit::lang.table-length-menu') }}",
                loadingRecords: "{{ trans('ticketit::lang.table-loading-results') }}",
                processing: "{{ trans('ticketit::lang.table-processing') }}",
                search: "{{ trans('ticketit::lang.table-search') }}",
                zeroRecords: "{{ trans('ticketit::lang.table-zero-records') }}",
                paginate: {
                    first: "{{ trans('ticketit::lang.table-paginate-first') }}",
                    last: "{{ trans('ticketit::lang.table-paginate-last') }}",
                    next: "{{ trans('ticketit::lang.table-paginate-next') }}",
                    previous: "{{ trans('ticketit::lang.table-paginate-prev') }}"
                },
                aria: {
                    sortAscending: "{{ trans('ticketit::lang.table-aria-sort-asc') }}",
                    sortDescending: "{{ trans('ticketit::lang.table-aria-sort-desc') }}"
                },
            },
            columns: [
                {data: 'id', name: 'ticketit.id'},
                {data: 'subject', name: 'subject'},
                {data: 'status', name: 'ticketit_statuses.name'},
                {data: 'updated_at', name: 'ticketit.updated_at'},
                {data: 'agent', name: 'users.name'},
                    @if( $u->isAgent() || $u->isAdmin() )
                {
                    data: 'priority', name: 'ticketit_priorities.name'
                },
                {data: 'owner', name: 'users.name'},
                {data: 'category', name: 'ticketit_categories.name'}
                @endif
            ]
        });
        $(document).on('ready',function(){
            var s = $('#DataTables_Table_0_wrapper').children('.row');
            $.each(s,function(k,v){
                $(v).addClass('col-12');
           });
        });

    </script>

@append
