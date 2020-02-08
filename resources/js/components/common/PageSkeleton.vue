<template>
  <div>
    <div class="skeleton d-flex">
      <div class="avatar"></div>
      <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
.skeleton {
  width: 100%;
  height: 100%;
}
.lines {
  width: 66%;
}
.skeleton .avatar {
  float: left;
  width: 52px;
  height: 52px;
  background-color: #ccc;
  border-radius: 2%;
  margin: 8px;
  background-image: linear-gradient(
    90deg,
    #f4f4f4 0px,
    rgba(229, 229, 229, 0.8) 40px,
    #f4f4f4 80px
  );
  background-size: 600px;
  animation: shine-avatar 2s infinite ease-out;
}
.skeleton .line {
  float: left;
  width: 140px;
  height: 16px;
  margin-top: 12px;
  border-radius: 7px;
  background-image: linear-gradient(
    90deg,
    #f4f4f4 0px,
    rgba(229, 229, 229, 0.8) 40px,
    #f4f4f4 80px
  );
  background-size: 600px;
  animation: shine-lines 2s infinite ease-out;
}
.skeleton .avatar + .line {
  margin-top: 11px;
  width: 100px;
}
.skeleton .line ~ .line {
  background-color: #ddd;
}

@keyframes shine-lines {
  0% {
    background-position: -100px;
  }
  40%,
  100% {
    background-position: 140px;
  }
}
@keyframes shine-avatar {
  0% {
    background-position: -32px;
  }
  40%,
  100% {
    background-position: 208px;
  }
}
</style>
