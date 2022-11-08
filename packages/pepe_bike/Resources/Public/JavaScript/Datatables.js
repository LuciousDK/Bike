
/**
* Module: TYPO3/CMS/PepeBike/Datatables
*/
define(['jquery', 'TYPO3/CMS/Core/Ajax/AjaxRequest','TYPO3/CMS/Backend/Notification'], function ($, AjaxRequest, Notification) {

  document.querySelectorAll('.hidden-toggler').forEach(element => {
    element.addEventListener('change', () => {
      let uri = element.dataset.requestUri.replace('__status__',element.checked);
      let request = new AjaxRequest(uri)
        .get()
        .then(async function (data) {
          const result = await data.resolve();
          if(result.success){
            Notification.success('Update Successful', '"Hidden" field updated to ' + result.currentState);
          }else{
            Notification.error('Error', result.message);
          }

        });
    })
  })
});


