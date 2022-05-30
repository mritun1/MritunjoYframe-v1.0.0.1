function close_alert(e) {
  let parent1 = $(e).parent();
  $(parent1).parent().hide();
}

$(document).ready(function () {
  $("[go_href]").click(function () {
    let go_href = $(this).attr("go_href");
    let go_target = $(this).attr("go_target");
    if (typeof go_target !== "undefined" && go_target !== false) {
      window.open(go_href, go_target);
    } else {
      window.location.href = go_href;
    }
  });
  // --------------------------------------
  // REDIRECT WHEN CLICK
  // --------------------------------------
  // <button go_href="/" >Home</button>
  // <button go_target="_blank" go_href="/new-problems" >Newest</button>
  //---
  $(".modal-close").click(function () {
    let parent = $(this).parent().parent().parent().parent().parent();
    parent.css("display", "none");
    $(this).closest("form").find("input[type=text], textarea").val("");
  });
  // --------------------------------------
  // MODAL CLOSE - ON CLICK
  // --------------------------------------
  $(".close-alert").click(function () {
    let parent1 = $(this).parent();
    $(parent1).parent().hide();
  });
  // --------------------------------------
  // ALERT CLOSE - ON CLICK
  // --------------------------------------
  $("*[modal-show]").click(function () {
    let modalId = $(this).attr("modal-show");
    $("#" + modalId).css("display", "block");
  });
  // --------------------------------------
  // SHOW MODAl - ON CLICK
  // --------------------------------------
  $("a[del-for]").click(function () {
    $("#deleteModal").css("display", "block");
    $("button[delete-confirm]").attr("delete-confirm", $(this).attr("del-for"));
    $("button[delete-confirm]").attr("del-id", $(this).attr("del-id"));
  });
  // --------------------------------------
  // TO SHOW DELETE MODAl - ON CLICK
  // --------------------------------------
  $("button[delete-confirm]").click(function () {
    var data = new FormData();
    data.append("forDeleting", "Delete");
    data.append("delete-confirm", $(this).attr("delete-confirm"));
    data.append("del-id", $(this).attr("del-id"));

    $.ajax({
      url: "/func/delete",
      type: "post",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data) {
        let mgs = JSON.parse(JSON.stringify(data));
        console.log(data);
        if (mgs.code == 1) {
          window.location.href = window.location.href;
        } else {
          $("#deleteStatus").html(
            `<div class="alert alert-danger">
                                 <div>
                                 <a href="javascript:void(0)" class="close-alert"><i class="fa-solid fa-xmark"></i></a>
                                 <p>` +
              mgs.status +
              `</p>
                                 </div>
                             </div>`
          );
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  });
  // --------------------------------------
  // CONFIRM DELETE - ON CLICK
  // --------------------------------------
  //..............................................................
  //      TEXT-EDITOR  START
  //..............................................................

  function chooseColor() {
    var mycolor = document.getElementById("myColor").value;
    document.execCommand("foreColor", false, mycolor);
  }

  function changeFont() {
    var myFont = document.getElementById("input-font").value;
    document.execCommand("fontName", false, myFont);
  }

  function changeSize() {
    var mysize = document.getElementById("fontSize").value;
    document.execCommand("fontSize", false, mysize);
  }

  //const ele = document.getElementById('editor1');
  const ele = document.getElementsByClassName("editor")[0];
  //------------------------------------------------------
  // Get the placeholder attribute
  //------------------------------------------------------
  const placeholder = ele.getAttribute("data-placeholder");
  // Set the placeholder as initial content if it's empty
  ele.innerHTML === "" && (ele.innerHTML = placeholder);
  ele.addEventListener("focus", function (e) {
    const value = e.target.innerHTML;
    value === placeholder && (e.target.innerHTML = "");
  });
  ele.addEventListener("blur", function (e) {
    const value = e.target.innerHTML;
    value === "" && (e.target.innerHTML = placeholder);
  });
  //..............................................................
  //      TEXT-EDITOR  END
  //..............................................................
  function submitForm(id, data, event, func) {
    event.preventDefault();
    $.ajax({
      url: $(id).attr("action"),
      type: $(id).attr("method"),
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data) {
        let mgs = JSON.parse(JSON.stringify(data));
        return func(mgs);
      },
      error: function (err) {
        alert(err);
      },
    });
  }
  //..............................................................
  //      SUBMIT FORM - ONCLICK
  //..............................................................
  // $("#formtest").submit(function (event) {
  //   var data = new FormData(this);
  //   //ADD ADDITIONAL FORM HERE
  //   data.append("addDocsPage", "Adding");
  //   submitForm(this, data, event, function (mgs) {
  //     if (mgs.code == 1) {
  //       //ADD YOUR PROGRAM HERE ON SUCCESS
  //       console.log(mgs);
  //     }
  //   });
  // });
  //..............................................................
});
