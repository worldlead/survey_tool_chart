document.onreadystatechange = function () {
  if (document.readyState !== "complete") {
      document.querySelector("div.app-wrapper").style.opacity = "0";
      document.querySelector("div.app-wrapper").style.display = "none";
      document.querySelector("div.spinner-container").style.display = "block";
  } else {
      document.querySelector("div.app-wrapper").style.opacity = "1";
      document.querySelector("div.app-wrapper").style.display = "block";
      document.querySelector("div.spinner-container").style.display = "none";
  }
};

(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()



function record_update(record, formid) {
  const form = document.getElementById(formid);
  var inputs = form.getElementsByClassName('form-control');
  for (var i = 1; i<inputs.length; i++) {
      var input = inputs[i];
      
        for (const key in record) {
            if (input.name == key) {
                input.value = record[key];
            }
        }
       
  }
}

function filterOptions() {
  // Declare variables
  var input, filter, options, i, txtValue;
  input = document.getElementById('select-input');
  filter = input.value.toUpperCase();
  options = document.getElementById('options').getElementsByTagName('option');

  // Loop through all options and hide those that don't match the search query
  for (i = 0; i < options.length; i++) {
    txtValue = options[i].textContent || options[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      options[i].style.display = '';
    } else {
      options[i].style.display = 'none';
    }
  }
}

function search_names(tbname) {
    $('tr').show();
    const search_term = $('#search_term').val();
    if (search_term !="") {
      $.post("../../api/record_fetch.php", {
        id: "search",
        term: search_term,
        tbname: tbname
      }, function(data, status) {
        records = JSON.parse(data);
        if (records.length != 0) {
          const trs = $('tr');
          for (i=1; i<trs.length; i++) {
            if (!records.includes($(trs[i]).children('td').eq(1).text())) {
              $(trs[i]).hide();
            }
          }
        } else {
          $('tr').hide();
        }
      });
    } else {
      $('tr').show();
    }
    
}

function delete_item(tbname, deleteBtn) {
  
  id = deleteBtn.attr('id');
  $('#delete-modal').modal('show');
  
  $('#confirm-delete-btn').on("click", function(){
    $.post("../../api/record_delete.php", { id: id, tbname: tbname }, function(data, status) {
      $('#delete-modal').modal('hide');
      $(`#doc_card_${id}`).hide();
      deleteBtn.closest("tr").hide();
    });
  });
}

function delete_con(tbname, id) {
  $.post("record_delete.php", { id: id, tbname: tbname }, function(data, status) {
    console.log(data);
  });
}

