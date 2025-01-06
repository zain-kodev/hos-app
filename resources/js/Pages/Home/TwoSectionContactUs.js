import Input from "@/Components/Input";
import Textarea from "@/Components/Textarea";
import TwoSection, {
    TwoSectionText,
    TwoSectionSubTitle,
    TwoSectionTitle,
} from "@/Components/TwoSection";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const TwoSectionContactUs = () => {
    return (
        <TwoSection img="/img/contact.png" reverse={true}>
            <div className="text-center max-w-lg mx-auto">

                <TwoSectionSubTitle className="mb-1">
                    تواصل معنا
                </TwoSectionSubTitle>

                {/*<TwoSectionTitle>DI HOLA</TwoSectionTitle>*/}

                <TwoSectionText>
                    سوف يتم الرد عليك في اقرب وقت ممكن بواسطة فريق محترف
                </TwoSectionText>

                <div className="mb-10 lg:px-10">
                    <form action="" className="space-y-3">
                        <Input
                            required={true}
                            name="name"
                            placeholder="الاسم الكامل"
                        />
                        <Input
                            required={true}
                            name="email"
                            placeholder="البريد الالكتروني"
                        />
                        <Textarea
                            required={true}
                            name="name"
                            placeholder="الرسالة"
                        />
                    </form>
                </div>

                <div >
                    <Link href="#" className="btn btn-md">
                        ارسال
                    </Link>
                </div>
            </div>
        </TwoSection>
    );
};

export default TwoSectionContactUs;
