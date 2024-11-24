document.addEventListener('DOMContentLoaded', function () {
    const currentDateElement = document.getElementById('currentDate');
    if (currentDateElement) {
        const now = moment().format('MMMM Do YYYY, h:mm:ss a');
        currentDateElement.textContent = now;
    }
});
