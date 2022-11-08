
/**
* Module: TYPO3/CMS/PepeBike/Datatables
*/
define(['jquery', 'TYPO3/CMS/Core/Ajax/AjaxRequest'], function ($, AjaxRequest) {

  document.querySelectorAll('.hidden-toggler').forEach(element => {
    element.addEventListener('change', () => {
      let uri = element.dataset.requestUri.replace('__status__',element.checked);
      let request = new AjaxRequest(uri)
        .get()
        .then(async function (response) {
          const resolved = await response.resolve();
        });
    })
  })
});


