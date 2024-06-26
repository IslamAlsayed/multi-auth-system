<script>
    let selectRole = document.getElementById('selectRole');
if(selectRole){
let panels = document.querySelectorAll('.panel');

selectRole.addEventListener('change', (e) => {
    let staticForm = document.getElementById(`${selectRole.value}`);
    panels.forEach(panel => panel.style.display = 'none')
    staticForm ? staticForm.style.display = 'block' : false;
})
}
</script>