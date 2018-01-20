<form name="removeSubjectForm" method="POST" class="">
    <div class="actions">
        <input type="submit" name="removeSubjectButton" value="Удалить" class="ui negative button">
    </div>
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Выбрать</th>
            </tr>
        </thead>
        <tbody>
            {$i = 1}
            {foreach $subjects as $subject}
                <tr>
                    <td>
                        {$i}
                    </td>
                    <td>
                        {$subject->getDescription()}
                    </td>
                    <td>
                        <div class="ui checkbox">
                            <input type="checkbox" name="subjects[]" value="{$subject->getSubjectId()}">
                            <label></label>
                        </div>
                    </td>
                </tr>
                {$i = $i + 1}
            {/foreach}
        </tbody>
    </table>
</form>