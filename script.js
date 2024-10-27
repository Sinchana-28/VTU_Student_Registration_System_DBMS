
function redirectToStudent() {
    window.location.href = "student.html";
}

function redirectToView() {
    window.location.href = "view.php";
}

function showTwelveMarksPage() {
    document.getElementById("personalDetailsForm").classList.add("hidden");
    document.getElementById("twelveMarksForm").classList.remove("hidden");
}

function showTenMarksPage() {
    document.getElementById("twelveMarksForm").classList.add("hidden");
    document.getElementById("tenMarksForm").classList.remove("hidden");
}

function showCollegeDetailsPage() {
    document.getElementById("tenMarksForm").classList.add("hidden");
    document.getElementById("collegeDetailsForm").classList.remove("hidden");
}

function showExamResultsPage() {
    document.getElementById("collegeDetailsForm").classList.add("hidden");
    document.getElementById("examResultsForm").classList.remove("hidden");
}

function showAccommodationDetailsPage() {
    document.getElementById("examResultsForm").classList.add("hidden");
    document.getElementById("accommodationDetailsForm").classList.remove("hidden");
}

function showCollegeBillDetailsPage() {
    document.getElementById("accommodationDetailsForm").classList.add("hidden");
    document.getElementById("collegeBillDetailsForm").classList.remove("hidden");
}

function showPreviousPage() {
    if (!document.getElementById("personalDetailsForm").classList.contains("hidden")) {
        // No previous page before personal details
        return;
    } else if (!document.getElementById("twelveMarksForm").classList.contains("hidden")) {
        // Show personal details page
        document.getElementById("personalDetailsForm").classList.remove("hidden");
        document.getElementById("twelveMarksForm").classList.add("hidden");
    } else if (!document.getElementById("tenMarksForm").classList.contains("hidden")) {
        // Show twelve marks page
        document.getElementById("twelveMarksForm").classList.remove("hidden");
        document.getElementById("tenMarksForm").classList.add("hidden");
    } else if (!document.getElementById("collegeDetailsForm").classList.contains("hidden")) {
        // Show ten marks page
        document.getElementById("tenMarksForm").classList.remove("hidden");
        document.getElementById("collegeDetailsForm").classList.add("hidden");
    } else if (!document.getElementById("examResultsForm").classList.contains("hidden")) {
        // Show college details page
        document.getElementById("examResultsForm").classList.add("hidden");
        document.getElementById("collegeDetailsForm").classList.remove("hidden");
    } else if (!document.getElementById("accommodationDetailsForm").classList.contains("hidden")) {
        // Show exam results page
        document.getElementById("accommodationDetailsForm").classList.add("hidden");
        document.getElementById("examResultsForm").classList.remove("hidden");
    } else if (!document.getElementById("collegeBillDetailsForm").classList.contains("hidden")) {
        // Show accommodation details page
        document.getElementById("collegeBillDetailsForm").classList.add("hidden");
        document.getElementById("accommodationDetailsForm").classList.remove("hidden");
    }
}