db.collection("temperatures")
    .get()
    .then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
        console.log(doc.id, " => ", doc.data());
        // Add code here to display temperatures on the webpage
        });
    });
