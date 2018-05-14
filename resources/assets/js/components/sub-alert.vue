<template>
    <transition name="bounceUp">
        <div v-if="opened" class="sub-alert">
            <div @click="opened=false" class="close-icon">
                <i class="fas fa-times"></i>            
            </div>
            <p>{{subscribeMsg}}</p>
            <div class="sub-alert-form">
                <div class="sub-alert-input">
                    <input @keyup.enter="sendData" v-model="email" type="email" :placeholder="subscribeEmailPlaceholder">
                    <p v-show="error">{{error}}</p>
                </div>
                <button @click="sendData" type="button">{{subscribeBtnText}}</button>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
  props : ["subscribeMsg","subscribeEmailPlaceholder","subscribeBtnText","lang","invalidEmail"],
  data(){
      return {
          opened : false,
          email:'',
          error : ''
      }
  },
  methods : {
      validEmail:function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      },
      sendData(){
          if (!this.validEmail(this.email)) {
              this.error=this.invalidEmail;
              return false;
          }

          axios.post("/subscribe",{
              email : this.email,
              lang : this.lang
          })
            .then((response) => {
                this.opened=false;           
            })
            .catch(function (error) {
                console.log(error);
            });
      }
  },
  created(){
      
        setTimeout(() => {
            this.opened=true;
        }, '7000');
  }
}
</script>





<style>


.sub-alert {
  width: 100%;
  position: fixed;
  bottom: 0;
  left: 0;
  box-shadow: 10px 0 80px rgba(0, 0, 0, 0.4);
  right: 0;
  padding: 10px 0 50px;
  height: auto;
  direction: rtl;
  z-index: 5;
  border: 2px dotted white;
  text-align: center;
  background-image: linear-gradient(to right, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%);
}

.sub-alert button {
  border: none;
  color: white;
  width: 100px;
  font-weight: bold;
  cursor: pointer;
  height: 35px;
  border-radius: 30px;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: "Cairo", sans-serif;
  background-image: linear-gradient(to right, #cc208e 0%, #6713d2 100%);
  margin: 30px 20px 5px;
}

.sub-alert p {
  font-size: 25px;
  margin-bottom: 0;
}

.sub-alert input {
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
  border-radius: 30px;
  font-family: "Cairo", sans-serif;
  border: none;
  padding: 0 10px;
  width: 300px;
  height: 35px;
  margin : 30px 0 5px;
  font-size: 15px;
}

.close-icon {
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    right: 0;
    top: 0;
    margin: 10px 15px;
}


.bounceUp-enter-active, .bounceUp-leave-active {
  transition: bottom .8s, opacity .8s;
}
.bounceUp-enter, .bounceUp-leave-to {
  opacity: 0;
  bottom: -20px;
}

.sub-alert-form {
    justify-content: space-around;
    display: flex;
    flex-wrap: wrap;
    max-width: 500px;
    margin: auto;
}

.sub-alert-input{
    position:relative;
}

.sub-alert-input p{
    font-size: 14px;
    margin : 0;
    opacity: 0;
    position: absolute;
    bottom: -15px;
    width: 100%;
    color : #d44a4a;
    animation: slide_down_error .5s forwards;
}

@keyframes slide_down_error{
    form{bottom:-15px;opacity: 0}
    to{bottom:-25px;opacity: 1}
}
</style>
