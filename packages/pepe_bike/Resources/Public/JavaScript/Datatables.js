
/**
* Module: TYPO3/CMS/PepeBike/Datatables
*/
define(['jquery', 'TYPO3/CMS/Core/Ajax/AjaxRequest'], function ($, AjaxRequest) {
  let request = new AjaxRequest(TYPO3.settings.ajaxUrls.hide_bike)
    .withQueryArguments({ uid: 1, hidden: true })
    .get()
    .then(async function (response) {
      const resolved = await response.resolve();
      console.log(response);
    });
});


