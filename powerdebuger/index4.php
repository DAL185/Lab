<?php
require_once "header.php";
?><br><br><br><br>

<form class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">错误标题:</label>
        <pr>不会
    </div>
    <div class="am-form-group">
        <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">错误内容:</label>
        <pr>界面未显示
    </div>

    <div class="am-form-group">
        <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">解决方案:</label>
        <div class="am-u-sm-10"><textarea rows="8"></textarea>


            <div class="am-dropdown" data-am-dropdown>
                <button class="am-btn am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>错误类型 <span class="am-icon-caret-down"></span></button>
                <ul class="am-dropdown-content">
                    <li><a href="#">代码错误</a></li>
                    <li><a href="#">忘记空行</a></li>
                    <li><a href="#">格式错误</a></li>
                </ul>
            </div>
        </div>
    </div>

    </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-default">提交方案</button>
        </div>
    </div>

</form>

