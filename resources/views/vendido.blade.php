@php($lng = \Session::get('lang'))
<style>


    .sold {
        background-image: url({!! url('sold/'.$lng.'.png') !!});
        background-size: contain;
        background-repeat: no-repeat;
    }

    @if($lng=='es')
    	.sold-n {
        width: 200px;
    }

    @elseif($lng=='en')
    	.sold-n {
        width: 115px;
    }

    @elseif($lng=='de')
    	.sold-n {
        width: 148px;
    }

    @elseif($lng=='fr')
    	.sold-n {
        width: 126px;
    }

    @elseif($lng=='it')
    	.sold-n {
        width: 176px;
    }

    @elseif($lng=='nl')
    	.sold-n {
        width: 165px;
    }

    @elseif($lng=='pt')
    	.sold-n {
        width: 200px;
    }
    @endif

</style>
