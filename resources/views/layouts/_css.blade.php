<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
<style>

.dohyeon-font{
    font-family: 'Do Hyeon', sans-serif;
}

.black-hans{
    font-family: 'Black Han Sans', sans-serif;
}

.headroom--not-top .profile-name{
    color: rgba(255, 255, 255, 0.9);
}


#main-bg {
   position: relative; /* #main-bg에 투명도를 주면 컨텐츠도 같이 투명해지기 때문에.. */
    z-index:1;
}
#main-bg:after {
    content : "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background-image: url('img/logo/no-logo.png'); 
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 100%;
    height: 100%;
    opacity : 0.25;
    z-index: -1;
}


img.login_school_image{
	width: 100%;
}

label.error-sign{
    margin-top: .5rem;
    font-size: .8rem;
    color: #CC3D3D;
}

table.building-table{
    border: 1px solid #284350;
}

.building-table td{
    width: 16.6%;
    border: 1px solid #284350;
}

td.locker-space{
    background-color: #BFB6A3;
}

td.empty-space{
    padding: 0.25rem 0.5rem;
}

td.class-space{
    background-color: #EDEDE1;
    font-size: 0.8rem;
    padding: 0.25rem 0.5rem;
    vertical-align: middle;
}



span.main-page-icon{
    font-size:2rem;
}

ul.nav-pills li.nav-item{
    margin-bottom: 0;
}

ul.nav-pills .nav-link{
    padding: 0.5rem 0.6rem;
}

table.locker-table td{
    padding: 0.5rem;
    border: 1px solid #284350;
}

table.locker-table td p:not(.my-locker-position){
    font-size: 0.8rem;
}

table.locker-table td.not-available-space:not(.my-locker){
    background-color: rgba(250,252,230,0.3);;
}

table.locker-table td.my-locker{
    background: rgba(250,252,230,0.3);
}
p.my-locker-position{
    font-size: x-small;
}
table.locker-table td.available-space{
    background-color: #EDEDE1;
}

table.locker-table td.broken-space{
    background-color: #BFB6A3;
}

#applyModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#applyModal div.modal-content{
    align-items: center;
}

#applyModal div.modal-body{
    padding-top: 2rem;
    border: 0;
}

#applyModal div.modal-footer{
    padding-bottom: 2rem;
    padding-top: 0;
    border: 0;
}

#errorModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#errorModal div.modal-content{
    align-items: center;
}

#errorModal div.modal-body{
    padding-top: 2rem;
    border: 0;
}

#errorModal div.modal-footer{
    padding-bottom: 2rem;
    padding-top: 0;
    border: 0;
}

#errorModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#emptyerrorModal div.modal-content{
    align-items: center;
}

#emptyerrorModal div.modal-body{
    padding-top: 2rem;
    border: 0;
}

#emptyerrorModal div.modal-footer{
    padding-bottom: 2rem;
    padding-top: 0;
    border: 0;
}

#mylockerModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#mylockerModal div.modal-content{
    align-items: center;
}

#mylockerModal div.modal-body{
    width: 80%;
    padding-top: 1.5rem;
    border: 0;
}

#mylockerModal div.modal-footer{
    padding-bottom: 1rem;
    padding-top: 0;
    border: 0;
}

#mainerrorModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#mainerrorModal div.modal-content{
    align-items: center;
}

#mainerrorModal div.modal-body{
    
    padding-top: 2rem;
    border: 0;
}

#mainerrorModal div.modal-footer{
    padding-bottom: 2rem;
    padding-top: 0;
    border: 0;
}

#deletelockerModal button.btn{
    padding: .3rem;
    min-width: 100px;
}

#deletelockerModal div.modal-content{
    align-items: center;
}

#deletelockerModal div.modal-body{
    padding-top: 2rem;
    border: 0;
}

#deletelockerModal div.modal-footer{
    padding-bottom: 2rem;
    padding-top: 0;
    border: 0;
}

#delete-locker-btn{ 
    background: rgba(65,139,120,0.8);
    color: white;
}

img.main-img{
    max-width: 30%;
}

img.footer-sejong-logo{
    max-width: 80%;
}

.card-header .collapse{
    display: flex !important;
}
</style>