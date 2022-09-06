
<script>
var link = document.querySelectorAll('.deleteBtn');
var updateLink = document.querySelectorAll('.updateBtn');
console.log(link);
link.forEach(element => {
    element.addEventListener('click', function(){
        var theId = this.getAttribute("data-id");
        var theType = this.getAttribute("data-what");
        var theCol = this.getAttribute("data-col");
        document.querySelector('.idToDelete').href = "?action=delete&id="+theId+"&what="+theType+"&col="+theCol;

    })
    })
    
    updateLink.forEach(element => {
    element.addEventListener('click', function(){
        var theId = this.getAttribute("data-id");

        document.querySelector("#id_update").value=this.getAttribute("data-id");
        document.querySelector("#step_update").value=this.getAttribute("data-step");
        document.querySelector("#interventions-update").value=this.getAttribute("data-type");
        document.querySelector("#date-update").value=this.getAttribute("data-date");
    })
    })
    


</script>



</body>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.2/dist/js/uikit-icons.min.js"></script>
</html>