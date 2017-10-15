<div class="ui top attached tabular menu">
    <a class="active item" data-tab="teachers">Преподаватели</a>
    <a class="item" data-tab="students">Студенты</a>
    <a class="item" data-tab="parents">Родители</a>
</div>
<div class="ui bottom attached active tab segment" data-tab="teachers">
    <table class="ui table">
        <thead>
            <tr>
                <th><h4>№</h4></th>
                <th><h4>ФИО</h4></th>
                <th><h4>Email</h4></th>
                <th><h4>Предметы</h4></th>
            </tr>
        </thead>
        <tbody>
            {$i = 1}
            {foreach $teachers as $teacher}
                <tr>
                    <td>{$i}</td>
                    <td>{$teacher->getSn()} {$teacher->getFn()} {$teacher->getPt()}</td>
                    <td>{$teacher->getEmail()}</td>
                    <td>
                        <div class="group tag lables">
                            {foreach $teacher->getSubjects() as $subject}
                                <a class="ui tag label">{$subject->getDescription()}</a>
                            {/foreach}
                        </div>
                    </td>
                </tr>
                {$i = $i + 1}
            {/foreach}
        </tbody>
    </table>
</div>
<div class="ui bottom attached tab segment" data-tab="students">
    <div class="ui cards">
        {foreach $studentsByGroup as $group => $students}
            <div class="ui card">
                <div class="content">
                    <div class="header">{$group}</div>
                </div>
                <div class="content">
                    <div class="ui ordered list">
                        {foreach $students as $student}
                            <div class="item">
                                {$student->getSn()} {$student->getFn()} {$student->getPt()}
                            </div>
                        {/foreach}
                    </div>
                </div>
                <div class="extra content">
                    <p>Кол-во: {count($students)}</p>
                </div>
            </div>
        {/foreach}
    </div>
</div>
<div class="ui bottom attached tab segment" data-tab="parents">
    Third
</div>