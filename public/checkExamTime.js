console.log(data);

const checkTimeExam = () => {
    const currentTime = new Date();
    const hours = currentTime.getHours();
    const minutes = currentTime.getMinutes();
    const seconds = currentTime.getSeconds();

    const formated_time = `${hours}:${padZero(minutes)}:${padZero(seconds)}`;

    const formattedDate = currentTime.toISOString().split("T")[0];

    data.forEach((element) => {
        if (
            element.exam_date == formattedDate &&
            element.start_time == formated_time
        ) {
            console.log("time comes");
        }
        // console.log(element.start_time);
    });
};

// checkTimeExam();
setInterval(checkTimeExam, 1000);

function padZero(number) {
    return (number < 10 ? "0" : "") + number;
}
