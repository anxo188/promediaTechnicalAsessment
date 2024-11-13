$(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      subject: $("#subject").val(),
      comments: $("#comments").val(),
      acknowledged: $("#acknowledged").val()
    };

    $.ajax({
      type: "POST",
      url: "index.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});