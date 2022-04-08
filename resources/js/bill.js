$(document).ready(function () {
  $("#getCustomer").click(function () {
    let status = $('#phoneCustomer').val();
    $.ajax({
      type: "GET",
      url: "/get-customer",
      data: { phone: status },
      success: function (data) {
        if (data.data.length === 0) {
          $('#modalCustomer').modal('show');
          $('#idCustomer').val('');
          $('#nameCustomer').val('');
          $('#addCustomer').val('');
          $('#inputPhoneCustomer').val(status);
        } else {
          $('#idCustomer').val(data.data[0].id);
          $('#nameCustomer').val(data.data[0].name);
          $('#addCustomer').val(data.data[0].address);
        }

        if ($(".eachProduct").length > 0 && $('#idCustomer').val().length > 0) {
          $("#create-bill-btn").prop("disabled", false);
        }
      }
    });
  });

  $("#createCustomerBtn").click(function () {
    let name = $('#inputNameCustomer').val();
    let number = $('#inputPhoneCustomer').val();
    let address = $('#inputAddCustomer').val();
    let email = $('#inputEmailCustomer').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/create-customer",
      data: {
        name: name,
        number: number,
        address: address,
        email: email
      },
      success: function (data) {
        if (data.success) {
          console.log(data.data.address)
          $("#err-customer").css("display", "none");
          $('#inputNameCustomer').val('');
          $('#inputPhoneCustomer').val('');
          $('#inputAddCustomer').val('');
          $('#inputEmailCustomer').val('');
          $('#modalCustomer').modal('hide');

          $('#phoneCustomer').val(data.data.number);
          $('#idCustomer').val(data.data.id);
          $('#nameCustomer').val(data.data.name);
          $('#addCustomer').val(data.data.address);
        }

        if (data.error.length != 0) {
          $("#err-customer").css("display", "block");
        }
      }
    });
  });

  $("#selectProducts").change(function () {
    if ($("#selectProducts").val() != 0) {
      $("#addProduct").prop("disabled", false);
    }
    if ($("#selectProducts").val() == 0) {
      $("#addProduct").prop("disabled", true);
    }
    let idProduct = $('#selectProducts').find(":selected").data("id");
    $("#amountProduct").val("1");
    $("#priceProduct").val("");
    $("#totalPrice").val("");
    $("#idProduct").val("");

    $.ajax({
      type: "GET",
      url: "/get-products",
      data: { id: idProduct },
      success: function (data) {
        $("#idProduct").val(data.data.id);
        $("#priceProduct").val(data.data.price);
        $("#amountProduct").attr('max', data.data.amount);

        let total = $("#amountProduct").val() * $("#priceProduct").val();
        $("#totalPrice").val(total);
      }
    });
  });

  $("#amountProduct").change(function () {
    let total = $("#amountProduct").val() * $("#priceProduct").val();
    $("#totalPrice").val(total);
  });
  var totalAll = 0;
  $("#addProduct").click(function () {

    let idProduct = $("#idProduct").val();
    let check = window.localStorage.getItem(idProduct);
    if (!!check) {
      $("#modalHasProduct").modal('show');
    } else {
      let parent = $("#productList");
      let number = $(".eachProduct").length + 1;
      let selectProducts = $("#selectProducts").val();
      let amountProduct = $("#amountProduct").val();
      let priceProduct = $("#priceProduct").val();
      let totalPrice = $("#totalPrice").val();
      let html = `
    <tr data-id="${idProduct}" class="eachProduct">
      <td scope="row">${number}</td>
      <td class="eachId">${idProduct}</td>
      <td class="eachNameProduct">${selectProducts}</td>
      <td class="eachAmount">${amountProduct}</td>
      <td class="eachUnitPrice">${priceProduct}</td>
      <td class="eachPrice">${totalPrice}</td>
      <td>
          <input type="button" data-id="${idProduct}" class="btn px-3 py-1 btn-delete-product" value="Xoá">
      </td>
    </tr>
    `
      parent.append(html);
      totalAll = totalAll + parseInt(totalPrice);
      $("#totalTotal").text(totalAll);
      window.localStorage.setItem(idProduct, 'has')
      $("#selectProducts").val("0").change();
      $("#amountProduct").val("");
      $("#priceProduct").val("");
      $("#totalPrice").val("");
      $("#idProduct").val("");
    }

    if ($(".eachProduct").length > 0 && $('#idCustomer').val().length > 0) {
      $("#create-bill-btn").prop("disabled", false);
    }

    $('.btn-delete-product').on("click", function () {
      let del = $(this).data("id");
      $(".eachProduct").each(function () {
        if ($(this).data("id") === del) {
          let x = $(this).find(".eachPrice").text();
          totalAll = totalAll - parseInt(x);
          $("#totalTotal").text(totalAll);
          $(this).remove();
        }
      });
      window.localStorage.removeItem(idProduct)
      if ($(".eachProduct").length == 0) {
        $("#create-bill-btn").prop("disabled", true);
      }
    });
  });

  window.onbeforeunload = function () {
    window.localStorage.clear();
  }

  $('#create-bill-btn').on("click", function () {
    let data = [];
    let idCustomer = $("#idCustomer").val();
    let totalTotal = $("#totalTotal").text();

    $(".eachProduct").each(function (index) {
      var obj = {
        id: $(this).find(".eachId").text(),
        amount: $(this).find(".eachAmount").text(),
      }
      data.push(obj);
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/bill",
      data: {
        idCustomer: idCustomer,
        totalTotal: parseInt(totalTotal),
        data: data,
      },
      success: function (data) {
        window.location.href = "/bill/" + data.bill;
      }
    });
  });

  $('#printBtn').on("click", function () {
    var mywindow = window.open('', 'PRINT', 'height=600,width=800');
    mywindow.document.write('<html><head>');
    mywindow.document.write('<link href="../../../public/css/app.css" rel="stylesheet">');
    mywindow.document.write('</head><body style="width: 80%; margin: auto;">');
    mywindow.document.write($("#print").html());
    mywindow.document.write('</body></html>');
    console.log($("#print").html());
    mywindow.print();
  });
});
