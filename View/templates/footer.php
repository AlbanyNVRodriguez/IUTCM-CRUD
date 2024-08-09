    <footer>Albany Vergel</footer>
    <script>
        function edit_task(id, title, desc, status, date){
            document.querySelector(".container").classList.add("after");
            document.querySelector("#modal_edit").classList.add("active");
            console.log(title);
        }

        function close_modal(){
            document.querySelector(".container").classList.remove("after");
            let modals = document.querySelectorAll(".modal");
            modals.forEach(m => m.classList.remove("active"));
        }
    </script>
    <script type="module" src="<?php echo (basename($_SERVER['PHP_SELF']) == "index.php")? "../View/js/index.js" : "../View/js/index.js" ?>"></script>
</body>
</html>