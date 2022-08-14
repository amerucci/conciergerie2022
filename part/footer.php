
<script>
var link = document.querySelectorAll('.deleteBtn');
console.log(link);
link.forEach(element => {
    element.addEventListener('click', function(){
        var theId = this.getAttribute("data-id");
        document.querySelector('.idToDelete').href = "?action=delete&id="+theId;
    })
    })
</script>



</body>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.2/dist/js/uikit-icons.min.js"></script>
</html>