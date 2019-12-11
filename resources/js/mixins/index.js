export default {
    methods: {
        notify(description, type = "success",
        message="Notification", placement="topRight") {
            this.$notification[type]({
                placement,
                message,
                description
              });
        }
    }
}
