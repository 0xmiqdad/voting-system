document.getElementById('votingForm').addEventListener('submit', function(event) {
    const studentId = document.getElementById('student_id').value;
    const password = document.getElementById('password').value;
    const president = document.querySelector('select[name="president"]').value;
    const vicePresident = document.querySelector('select[name="vice_president"]').value;
    const secretary = document.querySelector('select[name="secretary"]').value;

    if (!studentId || !password || !president || !vicePresident || !secretary) {
        alert('Please fill out all fields.');
        event.preventDefault();
    }
});