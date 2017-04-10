{assign var="title" value="EDUKIT | Настройки"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#admins" data-toggle="tab">Администраторы</a></li>
          <li><a href="#data" data-toggle="tab">Данные</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="admins">
						
          </div>
          <div class="tab-pane" id="data">
            3
          </div>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}