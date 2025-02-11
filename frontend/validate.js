document.getElementById('votingForm').addEventListener('submit', function(e) {
    // Validate that a candidate is selected for each position
    let president = document.querySelector('input[name="president"]:checked');
    let vicePresident = document.querySelector('input[name="vicePresident"]:checked');
    let secretary = document.querySelector('input[name="secretary"]:checked');
    
    if (!president || !vicePresident || !secretary) {
        alert("Please cast your vote for each position.");
        e.preventDefault();
    }
});
