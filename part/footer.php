
<script>
var link = document.querySelectorAll('.deleteBtn');
var updateLink = document.querySelectorAll('.updateBtn');
console.log(link);
link.forEach(element => {
    element.addEventListener('click', function(){
        var theId = this.getAttribute("data-id");
        document.querySelector('.idToDelete').href = "?action=delete&id="+theId;

    })
    })
    
    updateLink.forEach(element => {
    element.addEventListener('click', function(){
        var theId = this.getAttribute("data-id");

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