<?php
include 'header.php';
?>
  <div class="container">
    <div class="empty_placeholder">
    </div>
    <form class="" action="index.html" method="post">
      <div class="columns">
        <div class="column is-three-quarters">
          <div class="new_post">
            <input class="single_input" type="text" placeholder="Title">
            <div id="article_textarea" class="article_textarea">
            </div>
          </div>
        </div>
        <div class="column">
          <div class="sidebar-divider">
            <p class="is-size-5"><strong>Date</strong></p>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="calendar"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input data-toggle="datepicker" class="input datepicker" readonly>
              </p>
            </div>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="clock"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input clockpicker" readonly>
              </p>
            </div>
          </div><!-- close tag for sidebar divider -->
          <div class="sidebar-divider">
            <p class="is-size-5"><strong>Categories</strong></p>
            <div class="field">
              <div class="control">
                <div class="select is-fullwidth">
                  <select>
                    <option>Select dropdown</option>
                    <option>With options</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="sidebar-divider">
            <p class="is-size-5"><strong>Tags</strong></p>
            <input class="input no-focus" type="tags" placeholder="Add Tag" value="Tag1,Tag2,Tag3">
          </div>
          <a class="button is-primary">Submit</a>
        </div>
      </div>
    </form>
  </div><!-- close tag for container div -->
<?php
  include 'footerforpost.php';
?>
