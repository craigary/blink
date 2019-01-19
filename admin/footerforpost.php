<footer >
  <p>
    <strong>Blink</strong> by <a href="https://craigary.net">Craig Hart</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
  </p>
</footer>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/datepicker.min.js"></script>
<script src="../js/jquery-clockpicker.min.js"></script>
<script src="../js/quill.js"></script>
<script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
<script>

var quill = new Quill('#article_textarea', {
  modules: {
    toolbar: [
      [{
        header: []
      }],
      ['bold', 'italic', 'underline', 'link'],
      [{
        color: []
      }, {
        background: []
      }],
      [{
        list: 'ordered'
      }, {
        list: 'bullet'
      }],
      ['clean']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
});

var descquill = new Quill('#discription_textarea', {});


var c = new Date();
if (c.getMinutes() < 10) {
  var currentTime = c.getHours() + ":0" + c.getMinutes();
} else {
  var currentTime = c.getHours() + ":" + c.getMinutes();
}
$("input.clockpicker").attr("value", currentTime);

$('[data-toggle="datepicker"]').datepicker({
  autoPick: true,
  format: 'yyyy-mm-dd'
});
$('.clockpicker').clockpicker({
  twelvehour: false,
  donetext: "Okay"
});

var content = "<?php echo $singleArticleResult['text']; ?>";
quill.clipboard.dangerouslyPasteHTML(content);

function pushToHiddenTextarea() {
  document.getElementById("hiddenTextarea").value = quill.root.innerHTML;
  document.getElementById("hiddenDescriptionTextarea").value = descquill.root.innerHTML;
}

// $("#submit").click(function(){
// $("#hiddenTextarea").val(quill.root.innerHTML);
// $("#hiddenDescriptionTextarea").val(descquill.root.innerHTML);
// })

</script>
</body>
</html>
