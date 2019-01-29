$(document).ready(function() {
  $('a.page-link, .list-group-item').on('click', function(e) {
    e.preventDefault();
    href = this.href;
    document.getElementById('search').action = href;
    document.getElementById('search').submit(); 
  });

    var newval=$("[name=price]").val();
    $("#slidernumber").text(newval);

  $("[type=range]").change(function(){
    var newval=$(this).val();
    $("#slidernumber").text(newval);
  });
});
