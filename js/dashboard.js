function showNoti(message, notiType) {
  new Noty({
    theme: 'nest',
    type: notiType,
    timeout: 2000,
    animation: {
      open: 'animated bounceInRight fast',
      close: 'animated bounceOutRight fast'
    },
    text: message,
  }).show();
}
