@session('add')
<script>
    window.onload = function(){
        notif({
            msg: 'Success added section',
            type: 'success'
        })
    }
</script>
@endsession

@session('update')
<script>
    window.onload = function(){
        notif({
            msg: 'Success updated section',
            type: 'success'
        })
    }
</script>
@endsession

@session('delete')
<script>
    window.onload = function(){
        notif({
            msg: 'Success deleted section',
            type: 'success'
        })
    }
</script>
@endsession

@session('validate')
<script>
    window.onload = function(){
        notif({
            msg: '!This section is exsit',
            type: 'error'
        })
    }
</script>
@endsession