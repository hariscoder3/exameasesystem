console.log(data);
// =====get Time

const checkTimeExam = () => {
    const currentTime = new Date();
    const hours = currentTime.getHours();
    const minutes = currentTime.getMinutes();
    const seconds = currentTime.getSeconds();

    const formated_time = `${padZero(hours)}:${padZero(minutes)}:${padZero(
        seconds
    )}`;
    // console.log(formated_time);

    const formattedDate = currentTime.toISOString().split("T")[0];

    data.forEach((element) => {
        if (
            element.exam_date == formattedDate &&
            element.start_time == formated_time
        ) {
            console.log("HY");
            const end_time = element.end_time;
            console.log(end_time);
            const time_comp = end_time.split(":");
            const hr_end = time_comp[0];
            const min_end = time_comp[1];
            if (time_comp[2] == "00") {
                var sec_end = 0;
            } else {
                var sec_end = time_comp[2];
            }
            console.log(hr_end);
            console.log(min_end);
            console.log(sec_end);

            // Calculate the total seconds for the start time
            const totalSecondsStart = hours * 3600 + minutes * 60 + seconds;
            console.log("start", totalSecondsStart);

            // Calculate the total seconds for the end time
            const totalSecondsEnd = hr_end * 3600 + min_end * 60 + sec_end;
            console.log("end", totalSecondsEnd);

            // Calculate the time difference in seconds
            const timeDifferenceSeconds = totalSecondsEnd - totalSecondsStart;
            console.log("Diff", timeDifferenceSeconds);
            // Convert the time difference back to hours, minutes, and seconds
            const timeDifferenceHours = Math.floor(
                timeDifferenceSeconds / 3600
            );
            const timeDifferenceMinutes = Math.floor(
                timeDifferenceSeconds / 60
            );
            const remainingSeconds =
                timeDifferenceHours * 3600 + timeDifferenceMinutes * 60;
            const timeDifferenceSecondsFinal =
                timeDifferenceSeconds - remainingSeconds;

            var hr = timeDifferenceHours;
            var min = timeDifferenceMinutes;
            var sec = timeDifferenceSecondsFinal;
            console.log("after minus");
            console.log(hr);
            console.log(min);
            console.log(sec);
            const leave_time = element.leave_time;
            const leave_time_split = leave_time.split(":");
            console.log("leave_time");
            console.log(leave_time_split[0]);
            console.log(leave_time_split[1]);
            console.log(leave_time_split[2]);
            timeStart(
                hr,
                min,
                sec,
                element.course_name,
                leave_time_split[0],
                leave_time_split[1],
                leave_time_split[2],
                totalSecondsEnd
            );
        }
        // console.log(element.start_time);
    });
};

// checkTimeExam();
setInterval(checkTimeExam, 1000);

// checkTimeExam();

function padZero(number) {
    return (number < 10 ? "0" : "") + number;
}

// =======display portion

function timeStart(
    hr,
    min,
    sec,
    course_name,
    leave_hr,
    leave_min,
    leave_sec,
    totalSecondsEnd
) {
    const semicircles = document.querySelectorAll(".semicircle");
    const timer = document.querySelector(".timer");
    const heading = document.querySelector(".heading");
    const msg = document.querySelector(".msg");

    const hours = hr * 3600000;
    const minutes = min * 60000;
    const seconds = sec * 1000;
    console.log("actual time");
    console.log(hours);
    console.log(minutes);
    console.log(seconds);

    // leave time
    const time_end = totalSecondsEnd * 1000;
    const leave_hrs = leave_hr * 3600000;
    const leave_mins = leave_min * 60000;
    const leave_secs = leave_sec * 1000;
    console.log("time start");
    console.log(leave_hrs);
    console.log(leave_mins);
    console.log(leave_secs);

    const setLeaveTime = time_end - (leave_hrs + leave_mins + leave_secs);

    const setTime = hours + minutes + seconds;
    const startTime = Date.now();
    const futureTime = startTime + setTime;

    const timerloop = setInterval(countDownTimer);
    countDownTimer();

    function countDownTimer() {
        const currentTime = Date.now();
        const remainingTime = futureTime - currentTime;
        const angle = (remainingTime / setTime) * 360;
        // console.log(remainingTime);

        //progress indicaor
        if (angle > 180) {
            semicircles[2].style.display = "none";
            semicircles[0].style.transform = "rotate(180deg)";
            semicircles[1].style.transform = `rotate(${angle}deg)`;
        } else {
            semicircles[2].style.display = "block";
            semicircles[0].style.transform = `rotate(${angle}deg)`;
            semicircles[1].style.transform = `rotate(${angle}deg)`;
        }

        //timer
        const hrs = Math.floor(
            (remainingTime / (1000 * 60 * 60)) % 24
        ).toLocaleString("en-US", {
            minimumIntegerDigits: 2,
            useGrouping: false,
        });
        const mins = Math.floor(
            (remainingTime / (1000 * 60)) % 60
        ).toLocaleString("en-US", {
            minimumIntegerDigits: 2,
            useGrouping: false,
        });
        const secs = Math.floor((remainingTime / 1000) % 60).toLocaleString(
            "en-US",
            { minimumIntegerDigits: 2, useGrouping: false }
        );

        heading.innerHTML = `${course_name} Exam`;
        timer.innerHTML = `
        <div>${hrs}</div>
        <div class="colon">:</div>
        <div>${mins}</div>
        <div class="colon">:</div>
        <div>${secs}</div>`;

        //sec condition
        if (remainingTime < setLeaveTime) {
            msg.innerHTML = `<div class="alert alert-info mb-auto">Students are allowed to go if they want</div>`;
        } else if (remainingTime > setLeaveTime) {
            msg.innerHTML = `<div class="alert alert-danger mb-auto">Students are not allowed to leave the Exam Hall</div>`;
        }
        if (remainingTime <= 6000) {
            semicircles[0].style.backgroundColor = "red";
            semicircles[1].style.backgroundColor = "red";
            timer.style.color = "red";
        }
        //end
        if (remainingTime < 0) {
            msg.innerHTML = `<div class="alert alert-danger mb-auto">Exam Time Finished</div>`;
            clearInterval(timerloop);
            semicircles[0].style.display = "none";
            semicircles[1].style.display = "none";
            semicircles[2].style.display = "none";
            timer.innerHTML = `
            <div>00</div>
            <div class="colon">:</div>
            <div>00</div>
            <div class="colon">:</div>
            <div>00</div>`;

            timer.style.color = "lightgray";
        }
    }
}
