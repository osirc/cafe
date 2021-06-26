

function getSummary() {
    var summary;
    fetch(`../admin/summary.php`, {
        method: 'POST',
        headers: new Headers({"Content-Type": `application/json;charset=utf-8`,})
    })
    .then(response => {
        summary = JSON.parseText(response);
        alert(`Users: ${summary.users} Articles: ${summary.articles} 
                Profits: $${summary.profits} Pending transactions: ${summary.pendingTransactions}`)
    }).then(data=>{

    });
}