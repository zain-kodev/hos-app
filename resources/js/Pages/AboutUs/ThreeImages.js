import React from "react";

const ThreeImages = () => {
    return (
        <div className="grid lg:grid-cols-3">
            <div
                className="h-[400px] lg:h-[520px] w-full bg-cover bg-center"
                style={{ backgroundImage: "url(/img/home/img1.png)" }}
            ></div>
            <div
                className="h-[400px] lg:h-[520px] w-full bg-cover bg-center"
                style={{ backgroundImage: "url(/img/home/img2.png)" }}
            ></div>
            <div
                className="h-[400px] lg:h-[520px] w-full bg-cover bg-center"
                style={{ backgroundImage: "url(/img/home/img3.png)" }}
            ></div>
        </div>
    );
};

export default ThreeImages;
