
/**
* Module: TYPO3/CMS/PepeBike/Datatables
*/
define(['jquery', 'TYPO3/CMS/Core/Ajax/AjaxRequest', 'TYPO3/CMS/Backend/Notification'], function ($, AjaxRequest, Notification) {

  document.querySelectorAll('.hidden-toggler').forEach(element => {
    element.addEventListener('change', () => {
      let uri = element.dataset.requestUri.replace('__status__', element.checked);
      new AjaxRequest(uri)
        .get()
        .then(async function (data) {
          const result = await data.resolve();
          if (result.success) {
            Notification.success('Update Successful', '"Hidden" field updated to ' + result.currentState);
          } else {
            Notification.error('Error', result.message);
          }

        });
    })
  })

  document.querySelectorAll('.field-edit-button').forEach(element => {
    element.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      let td = element.closest('td');
      startEdit(td);
    })
  })

  document.querySelectorAll('.field-cancel-button').forEach(element => {
    element.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      let td = element.closest('td');
      finishEdit(td)

    })
  })

  document.querySelectorAll('.Datatables form').forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      e.stopPropagation();
      console.log(new FormData(e.target))


      // new AjaxRequest(TYPO3.settings.ajaxUrls.example_dosomething)
      //   .withQueryArguments({ input: randomNumber })
      //   .get()
      //   .then(async function (response) {
      //     const resolved = await response.resolve();
      //     console.log(resolved.result);
      //   });

      // let td = element.closest('td');
      // finishEdit(td);
    })
  })

  function startEdit(td) {
    td.closest('table').classList.add('editing');
    let cancelbtn = td.querySelector('.field-cancel-button');
    let editbtn = td.querySelector('.field-edit-button');
    let savebtn = td.querySelector('.field-save-button');
    let display = td.querySelector('.display-field');
    let input = td.querySelector('.edit-field');

    //TODO: Disable other edit buttons

    cancelbtn.classList.remove('hidden');
    savebtn.classList.remove('hidden');
    editbtn.classList.add('hidden');
    display.classList.add('hidden');
    input.value = display.innerText;

    input.removeAttribute('hidden');
    input.removeAttribute('disabled');

  }

  function finishEdit(td) {

    td.closest('table').classList.remove('editing')
    let cancelbtn = td.querySelector('.field-cancel-button');
    let editbtn = td.querySelector('.field-edit-button');
    let savebtn = td.querySelector('.field-save-button');
    let display = td.querySelector('.display-field');
    let input = td.querySelector('.edit-field');

    //TODO: Enable other edit buttons

    cancelbtn.classList.add('hidden');
    savebtn.classList.add('hidden');
    editbtn.classList.remove('hidden');
    display.classList.remove('hidden');
    input.value = display.innerText;

    input.setAttribute('hidden', '');
    input.setAttribute('disabled', '');

  }
});


