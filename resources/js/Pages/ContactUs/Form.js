import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Textarea from "@/Components/Textarea";
import React from "react";

const Form = () => {
    return (
        <div className="py-section container">
            <div className="flex flex-col gap-y-8 md:flex-row md:gap-y-0">
                <div className="w-full md:w-1/2 lg:w-1/3  ">
                    <img
                        src="/logo.png"
                        className="h-full w-full object-cover"
                        alt="contact"
                    />
                </div>
                <div className="w-full md:w-1/2 lg:w-2/3 ">
                    <div className=" md:pl-10 lg:pl-16 mr-5">
                        <p className="mb-1 font-script text-4xl text-gray-400 lg:text-5xl ">
                            تواصل معنا
                        </p>
                        <h3 className="title mb-5 text-3xl lg:text-4xl">
                            اترك لنا رسالة
                        </h3>
                        <p className="mb-10 font-text">
                            سوف يتم التواصل معك في اقرب وقت ممكن
                        </p>
                        <form action="">
                            <div className="mb-10 grid gap-5 md:grid-cols-2">
                                <Input
                                    required={true}
                                    name="name"
                                    placeholder="الاسم الاول"
                                />
                                <Input
                                    required={true}
                                    name="last_name"
                                    placeholder="الاسم الثاني"
                                />
                                <Input
                                    required={true}
                                    name="email"
                                    placeholder="البريد الالكتروني"
                                />
                                <Input
                                    required={true}
                                    name="website"
                                    placeholder="موقعك الالكتروني"
                                />
                                <div className="md:col-span-2">
                                    <Textarea
                                        required={true}
                                        name="message"
                                        placeholder="الرسالة"
                                    />
                                </div>
                            </div>
                            <Button >
                                ارسال
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Form;
