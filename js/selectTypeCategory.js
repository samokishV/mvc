window.onload = function() {
    type.addEventListener('change', function(){
        change();
    }, false);

    function change() {
        current_type = document.getElementById('type').value;
        list = "";
        for (i = 0; i < categories[current_type].length; i++) {
            list += "<option value=" + categories[current_type][i] + ">" + categories[current_type][i] + "</option>";
        }
        document.getElementById('subtype').innerHTML = list;
    }
}