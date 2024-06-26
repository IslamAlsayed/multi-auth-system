@session('add')
<script>
    window.onload = function(){
        notif({
            msg: 'Success added doctor',
            type: 'success'
        })
    }
</script>
@endsession

@session('update')
<script>
    window.onload = function(){
        notif({
            msg: 'Success updated doctor',
            type: 'success'
        })
    }
</script>
@endsession

@session('delete')
<script>
    window.onload = function(){
        notif({
            msg: 'Success deleted doctor',
            type: 'success'
        })
    }
</script>
@endsession

@session('error')
<script>
    window.onload = function(){
        notif({
            msg: 'error, try again!!',
            type: 'error'
        })
    }
</script>
@endsession

@session('invalid_image')
<script>
    window.onload = function(){
        notif({
            msg: 'Invalid image, try again!!',
            type: 'error'
        })
    }
</script>
@endsession