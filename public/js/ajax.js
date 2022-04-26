
if(document.querySelector('.current_typical_work_del')) {
    let buttonDelTypicalWork = document.querySelectorAll('.current_typical_work_del');

    buttonDelTypicalWork.forEach(e => {
       let parentForm = e.parentElement;

       e.addEventListener('click', () => {
            let idTypicalWork = +parentForm.querySelector('.current_typical_work_id').getAttribute('value');
            delTypicalWork(idTypicalWork, parentForm);
       });
    });
}

function delTypicalWork(id, parentForm){
    if (id > 0) {
        let xmlhttp = new XMLHttpRequest();
        let params = 'id=' + encodeURIComponent(id);

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                parentForm.remove();
            }
        };
        xmlhttp.open("GET", "add?" + params, true);
        xmlhttp.send();
    }
}
