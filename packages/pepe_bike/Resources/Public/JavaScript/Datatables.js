
/**
* Module: TYPO3/CMS/PepeBike/Datatables
*/
define(['jquery', 'TYPO3/CMS/Core/Ajax/AjaxRequest'], function ($, AjaxRequest) {
  // console.log(TYPO3.settings.ajaxUrls.hide_bike);
  // let request = new AjaxRequest(TYPO3.settings.ajaxUrls.hide_bike)
  //   .withQueryArguments({ uid: 1, hidden: true })
  //   .get()
  //   .then(async function (response) {
  //     const resolved = await response.resolve();
  //     console.log(response);
  //   });

  document.querySelectorAll('.hidden-toggler').forEach(element => {
    element.addEventListener('change', () => {
      let uri = element.dataset.requestUri.replace('__status__',element.checked);
      console.log(uri)
      let request = new AjaxRequest(uri)
        .get()
        .then(async function (response) {
          const resolved = await response.resolve();
          console.log(response);
        });
    })
  })
});


