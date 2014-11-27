<div id="left">
    <form action="search-results.html" method="GET" class='search-form'>
      <div class="search-pane">
        <input type="text" name="search" placeholder="Search here...">
        <button type="submit"><i class="icon-search"></i></button>
      </div>
    </form>
    <div class="subnav subnav-hidden">
      <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Questions</span></a> </div>
      <ul class="subnav-menu">
        <li> <a href="<?php echo base_url();?>question_master/list_question">List</a> </li>
        <li> <a href="<?php echo base_url();?>question_master/add_question">Create New</a> </li>
      </ul>
    </div>
    <div class="subnav subnav-hidden">
      <div class="subnav-title"> <a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Roster</span></a> </div>
      <ul class="subnav-menu">
        <li><a href="#">RosterManagement</a></li>
      </ul>
    </div>
  </div>