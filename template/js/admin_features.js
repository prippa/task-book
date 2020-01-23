$(document).ready(function() {
    function checkForRedirect(msg) {
        const url = '/login';

        if (msg === 'login') {
            window.location.href = url;
            return true;
        }

        return false;
    }

    window.tasks.forEach(function (task) {
        // Change Status
        $(`#status-change${task.id}`).click(function () {
            const completed = 'task-completed';
            const progress = 'task-in-progress';
            const status_info = $(`#status-info${task.id}`);

            this.disabled = true;
            $.ajax({
                type: "POST",
                url: "ajax/task/change_status",
                data: {id: task.id, status: +status_info.hasClass(progress)}
            }).done((msg) => {
                if (checkForRedirect(msg)) {
                    return;
                }

                if (status_info.hasClass(progress)) {
                    status_info.html('Completed!');
                    status_info.removeClass(progress);
                    status_info.addClass(completed);
                } else {
                    status_info.html('In progress.');
                    status_info.removeClass(completed);
                    status_info.addClass(progress);
                }
                this.disabled = false;
            });
        });

        // Change Text
        $(`#save-text-btn${task.id}`).click(function () {
            const text = $(`#text${task.id}`);
            text.val(text.val().trim());

            // Same text check
            if (text.val() === task.text) {
                return;
            }

            this.disabled = true;
            $.ajax({
                type: "POST",
                url: "ajax/task/change_text",
                data: {id: task.id, text: text.val()}
            }).done((msg) => {
                if (checkForRedirect(msg)) {
                    return;
                }

                this.disabled = false;
            });
        });
    });
});
