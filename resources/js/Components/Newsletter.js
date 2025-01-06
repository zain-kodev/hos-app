import React from "react";
import ApplicationLogo from "./ApplicationLogo";
import Button from "./Button";
import Input from "./Input";

const Newsletter = () => {
    return (
        <div className="bg-teal-50">
            <div className="py-section mx-auto flex max-w-6xl justify-center px-10 md:px-0">
                <div className="w-full space-y-8 md:w-2/3 lg:w-1/3  ">
                    <ApplicationLogo className="mx-auto h-20 w-20 " />
                    <p className="text-center font-text">
                        E'MMAR PLATFORM
                    </p>

                    <div className="flex">
                        <a href="https://apps.apple.com/be/app/id1583985554" style={{ marginLeft: 'auto'}} target="_blank">
                            <img src="/app-store-black.svg"/>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.kojed.khayroawn" target="_blank">
                            <img src="/google-play-black.svg"/>
                        </a>
                    </div>

                    {/*<div className="flex">*/}
                    {/*    <div className="flex-grow">*/}
                    {/*        <Input placeholder="البريد الالكتروني" />*/}
                    {/*    </div>*/}
                    {/*    <Button className="ml-1 btn btn-md">اشتراك</Button>*/}
                    {/*</div>*/}
                </div>
            </div>
        </div>
    );
};

export default Newsletter;
