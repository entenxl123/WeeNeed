

const ck_session = (i) => {
    axios.post("../api/controller/login.php?status=ch_session")
    .then(res => { 
        console.log(res.data)
        if(res.data == null){
            alert('ไม่มีการทำงานกรุณา ล็อกอินใหม่');
            location.href='http://10.2.1.184/website/backoffice/'
        }
        console.log('ck_secsstion')
     }).catch(error => {
        console.error(error);
     })
}

(function() {
    var i=0;
    while(i<60){
        setTimeout(ck_session, 60000*i);
        
        i++;
    }
    
    
})()


const sign_out = () => {
    axios.post("../api/controller/login.php?status=logout")
    .then(res => { 
        console.log(res.data)
        if(res.data==1){
            location.href = '../'
        }
     }).catch(error => {
        console.error(error);
     })
}