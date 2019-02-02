<footer>
  <p>
    <strong>Blink</strong> by <a href="https://craigary.net">Craig Hart</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
  </p>
</footer>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/moment.min.js"></script>
  <script src="../js/quill.min.js"></script>
  <script src="../js/markdownShortcuts.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
  <script src="../js/datepicker.min.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/dashboard.js"></script>
  <script type="text/javascript">

  window.onload = function () {
    $('[data-toggle="datepicker"]').datepicker({
    });
    $('#timepicker').timepicker({
      'timeFormat': 'H:i',
      'step': 15
    });
  }
var isMarkdown = <?php echo $settings['markdown']; ?>;
if (isMarkdown == 0) {
  var editor = new Quill('#article_textarea', {
      modules: {
        'toolbar': [
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         [ 'bold', 'italic', 'underline', 'strike' ],
         [{ 'align': [] }],
         [{ 'color': [] }, { 'background': [] }],
         [{ 'script': 'super' }, { 'script': 'sub' }],
         ['blockquote', 'code-block' ],
         [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
         [ 'link', 'image', 'video', 'formula' ],
         [ 'clean' ]
       ]
       },
      theme: 'snow'
    });

    var descEditor = new Quill('#description_textarea', {
        theme: 'snow'
      });
} else if (isMarkdown == 1) {
  Quill.register('modules/markdownShortcuts', MarkdownShortcuts)
  var editor = new Quill('#article_textarea', {
      modules: {
        'toolbar': [
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         [ 'bold', 'italic', 'underline', 'strike' ],
         [{ 'align': [] }],
         [{ 'color': [] }, { 'background': [] }],
         [{ 'script': 'super' }, { 'script': 'sub' }],
         ['blockquote', 'code-block' ],
         [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
         [ 'link', 'image', 'video', 'formula' ],
         [ 'clean' ]
       ],
       markdownShortcuts: {}
     },
      theme: 'snow'
    });

    var descEditor = new Quill('#description_textarea', {
        modules: {
          markdownShortcuts: {}
        },
        theme: 'snow'
      });
}
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
  };

  if (getUrlParameter('id') == undefined) {
    var getDateAndTime = Date.now();
    document.getElementById('datepicker').value = moment(getDateAndTime).format('MM/DD/YYYY');
    document.getElementById('timepicker').value = moment(getDateAndTime).format('HH:mm');
  } else {
    var content = " <?php echo $singleArticleResult['text']; ?> ";//grab content
    var description = "<?php echo $singleArticleResult['description']; ?>";//grab description
    document.getElementById('hiddenTextarea').innerHTML = content;
    editor.clipboard.dangerouslyPasteHTML(content);
    document.getElementById('hiddenDescriptionTextarea').innerHTML = description;
    descEditor.clipboard.dangerouslyPasteHTML(description);

    var getDateAndTime = "<?php echo $singleArticleResult['created']; ?>";
    document.getElementById('datepicker').value = moment(getDateAndTime).format('MM/DD/YYYY');
    document.getElementById('timepicker').value = moment(getDateAndTime).format('HH:mm');
    var isPage = "<?php echo $singleArticleResult['isPage']; ?>";
    if (isPage == 1) {
      $('.isPagecheckbox').prop('checked', true);
    } else {
      $('.isPagecheckbox').prop('checked', false);
    }
    
  }

  $('#submit').click(function(){
    $('#hiddenTextarea').val(editor.container.firstChild.innerHTML);
    $('#hiddenDescriptionTextarea').val(descEditor.container.firstChild.innerHTML);
  });

  </script>
</body>
</html>
