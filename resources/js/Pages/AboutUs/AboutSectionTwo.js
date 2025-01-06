import {TwoSectionSubTitle, TwoSectionText} from "@/Components/TwoSection";
import React from "react";
import AboutSection from "@/Pages/AboutUs/AboutSection";

const AboutSection2 = ({ reverse = false, children }) => {
    return (
        <div>
            <div className="mx-auto">
                <div
                    className={
                        "flex flex-col-reverse items-stretch  " +
                        (reverse ? "lg:flex-row-reverse" : "lg:flex-row")
                    }
                >

                    <div className="w-full">
                        <div className="py-section px-10 md:px-36 lg:px-16">
                            <div className="text-center">
                                <TwoSectionSubTitle className="mb-1">
                                    كيف تعمل المنصة
                                </TwoSectionSubTitle>
                                <div className="text-center max-w-lg mx-auto">
                                    <TwoSectionText>
                                        لكل قطاع مسار تجاري مدروس بعناية  حيث يستطيع مقدم الخدمة مثل المكتب الاستشاري ومختبر التربة ومكاتب التصميم الداخلي  من في حكمهم استعراض جميع خدماتهم في المنصة العامة (إعمار استور) والاستفادة من البوابة التقنية لمنصة اعمار لإدارة جميع مشاريعهم وعلاقات العملاء كما يتم تزويدهم بالتطبيق الالكتروني الأمثل (KO-PRSS) لتقديم خدماتهم بشكل احترافي بحيث يستطيع ارفاق تقارير الزيارات الميدانية للمشاريع ، و توثيق مخالفات البناء  بالصور وارفاق المستندات وغيرها ،   كما يستطيع التاجر و بائع المنتجات و كل من في حكمه عرض السلع
                                    </TwoSectionText>
                                    <TwoSectionText>
                                        والمنتجات في المنصة (اعمار استور )  والتحكم بالأسعار مباشرة وطرح العروض  الترويجية في سوق تنافسي يخدم  بالمقام الأول (المستهلك النهائي) والتواصل مع العملاء عبر التطبيق الخاصة بمزودي الخدمات او المنصة العامة حسب المسار التجاري لكل تجار .
                                    </TwoSectionText>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    );
};
export default AboutSection2;
