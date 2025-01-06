import React from "react";
import Button from "@/Components/Button";

import Input from "@/Components/Input";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, useForm } from "@inertiajs/inertia-react";
import { Heading2 } from "@/Components/Elements";
import AppLayout from "@/Layouts/AppLayout";
import Label from "@/Components/Label";

export default function ForgotPassword({ status }) {
    const { data, setData, post, processing, errors } = useForm({
        email: "",
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route("password.email"));
    };

    return (
        <AppLayout title="استعادة كلمة المرور">
            <div className="py-section container">
                {status && (
                    <div className="mb-4 text-sm font-medium text-green-600">
                        {status}
                    </div>
                )}

                <ValidationErrors errors={errors} />

                <div>
                    <Heading2 className="mb-6">هل نسيت كلمة المرور؟</Heading2>
                </div>

                <form onSubmit={submit} className="lg:w-1/2">
                    <div className="mb-4 font-text text-sm leading-normal text-gray-500">
                        هل نسيت كلمة المرور؟ لا يوجد مشكل. ببساطة يرجى إعلامنا بعنوان بريدك الإلكتروني وسنقوم بذلك سنرسل لك رابطًا عبر البريد الإلكتروني إعادة تعيين كلمة المرور التي ستسمح لك بالاختيار جديد.
                    </div>
                    <div>
                        <Label forInput="email" value="البريد الالكتروني *" />
                        <Input
                            type="text"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full"
                            isFocused={true}
                            handleChange={onHandleChange}
                        />
                    </div>

                    <div className="mt-4 flex items-center">
                        <Button  processing={processing}>
                            إعادة تعيين كلمة المرور
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
