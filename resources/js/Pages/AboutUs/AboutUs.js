import Banner from "@/Components/Banner";
import AppLayout from "@/Layouts/AppLayout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import OneSection from "../Home/OneSection";
import FlavorsList from "./FlavorsList";
import FlavorsList2 from "./FlavorsList2";
import ThreeImages from "./ThreeImages";
import AboutSectionContent from "@/Pages/AboutUs/AboutSectionContent";
import AboutSection from "@/Pages/AboutUs/AboutSection";
import AboutSection2 from "@/Pages/AboutUs/AboutSectionTwo";

const AboutUs = (props) => {
    return (
        <AppLayout title="About Us">
            <Banner
                img="/img/about-us/banner.jpg"
                subTitle="منصة إعمار"
                title="تعرف علينا أكثر"
            />
            <FlavorsList products={props.productsVegan} />
            <div className="sm:flex items-center max-w-screen-xl">
                <div className="sm:w-1/2 p-10 mr-10">
                    <div className="text">
                        <span className="text-gray-500 border-b-2 border-indigo-600 uppercase">تعرف علينا</span>
                        <h2 className="my-4 font-bold text-3xl sm:text-4xl">كيف تعمل <span className="text-indigo-600">منصة إعمار</span></h2>
                        <p className="text-gray-700">
                            لكل قطاع مسار تجاري مدروس بعناية حيث يستطيع مقدم الخدمة مثل المكتب الاستشاري ومختبر التربة ومكاتب التصميم الداخلي من في حكمهم استعراض جميع خدماتهم في المنصة العامة (إعمار استور) والاستفادة من البوابة التقنية لمنصة اعمار لإدارة جميع مشاريعهم وعلاقات العملاء كما يتم تزويدهم بالتطبيق الالكتروني الأمثل (KO-PRSS) لتقديم خدماتهم بشكل احترافي بحيث يستطيع ارفاق تقارير الزيارات الميدانية للمشاريع ، و توثيق مخالفات البناء بالصور وارفاق المستندات وغيرها ، كما يستطيع التاجر و بائع المنتجات و كل من في حكمه عرض السلع

                            والمنتجات في المنصة (اعمار استور ) والتحكم بالأسعار مباشرة وطرح العروض الترويجية في سوق تنافسي يخدم بالمقام الأول (المستهلك النهائي) والتواصل مع العملاء عبر التطبيق الخاصة بمزودي الخدمات او المنصة العامة حسب المسار التجاري لكل تاجر .
                        </p>
                    </div>
                </div>
                <div className="sm:w-1/2 p-10">
                    <div className="image object-center text-center">
                        <img src="/img/about-us/4.png" alt="About Us" />
                    </div>
                </div>
            </div>
            <div className="sm:flex items-center max-w-screen-xl">
                <div className="sm:w-1/2 p-10">
                    <div className="image object-center text-center">
                        <img src="/img/about-us/3.png" alt="About Us" />
                    </div>
                </div>
                <div className="sm:w-1/2 p-5">
                    <div className="text">
                        <span className="text-gray-500 border-b-2 border-indigo-600 uppercase">تعرف علينا</span>
                        <h2 className="my-4 font-bold text-3xl sm:text-4xl">رؤية <span className="text-indigo-600">منصة إعمار</span></h2>
                        <p className="text-gray-700">
                            نستمد رؤيتنا من رؤية 2030 وبرنامج التحول الرقمي، في المملكة العربية السعودية، حيث نطور منصتنا عبر تطوير نظام تقني يعتمد على الذكاء الاصطناعي، في الربط وتحليل المعلومات بين المستهلك وجميع مزودي الخدمة والمنتج وكل جهة ذات اختصاص في البناء والعمار كما يعمل على تحليل البيانات وتوليد احتمالات عده في خلق فرص تجارية متوقعة بنظام التنبؤ المستقبلي ومشاركة تلك الاحتمالات مع شركاء النجاح فعندما يتقدم احد العملاء بطلب اختبار تربة لإرض في مدينة ماء يعمل النظام على توقع كمية الحديد في تلك الأرض عبر خوارزم محددة تحلل نوع و موقع الأرض ونظام البناء في تلك المنطقة والنسبة المسموح بهاء البناء واجمالي السطح الخرساني، مع احتساب أنواع الخرسانة المستخدمة من المشاريع السابقة وينتج احتمالية بكمية الحديد المتوقع ويخُطر النظام تلقائيا المكتب الاستشاري عن وجود عميل محتمل وهنا يُقدم المكتب الاستشاري عرض سعر  للعميل كما يخبر المقاول ومصنع الحديد والعديد من له صلة بذلك،،، وتعم الفائدة.
                        </p>
                    </div>
                </div>
            </div>
            <div className="sm:flex items-center max-w-screen-xl">
                <div className="sm:w-1/2 p-10 mr-5">
                    <div className="text">
                        <span className="text-gray-500 border-b-2 border-indigo-600 uppercase">تعرف علينا</span>
                        <h2 className="my-4 font-bold text-3xl sm:text-4xl">الاقتصاد <span className="text-indigo-600">التشاركي</span></h2>
                        <p className="text-gray-700">
                            نبني ونؤمن بالاقتصاد التشاركي والذي يعتمد على تقديم الخدمات الاحترافية عبر مزود الخدمة بطريقة أكثر فعالية كما يتم صناعة الفرصة التجارية ليستفيد جميع الأطراف وتعتمد هذه العمليات على اتفاقات قانونية مع شركاء النجاح تنص على نظام انتاج الخدمة بألية الإنتاج الموحد  الصادر من الجهات ذات الاختصاص، وبتوصيف دقيق عن الخدمة ومخرجاتها  بالمقابل يتم استعراض جميع خدمات شركاء النجاح في المنصة، بفرص متساوية للجميع وكل ما حقق مزود الخدمة مستويات اعلى في التقييم من قبل تجربة العميل ، زادت فرصة بالاستحواذ على الطلبات بشكل اسرع.
                        </p>
                    </div>
                </div>
                <div className="sm:w-1/2 p-10">
                    <div className="image object-center text-center">
                        <img src="/img/about-us/2.png" alt="About Us" />
                    </div>
                </div>
            </div>
            <div className="sm:flex items-center max-w-screen-xl">
                <div className="sm:w-1/2 p-10">
                    <div className="image object-center text-center">
                        <img src="/img/about-us/1.png" alt="About Us" />
                    </div>
                </div>
                <div className="sm:w-1/2 p-10">
                    <div className="text">
                        <span className="text-gray-500 border-b-2 border-indigo-600 uppercase">تعرف علينا</span>
                        <h2 className="my-4 font-bold text-3xl sm:text-4xl">شركاء <span className="text-indigo-600">النجاح</span></h2>
                        <p className="text-gray-700">
                            شركاء النجاح هو مصطلح يطلق على كل كيان تجاري او مهني  مختص يقدم خدماتة لمجال البناء والعمار ويستهدف هذا القطاع، بمختلف التخصصات وكل من يستهدف المشاريع السكنية او السياحية والاستثمارية التجارية  كالتالي ملاك العقار والاراضي - مكاتب المساحة – مختبرات التربة - المكاتب الاستشارية بجميع خدماتها، شركات المقاولات العامة المصنفة او المعتمدة لدى هيئة المقاولين- شركات المقاولات  العامة و الخاصة (مقاول عظم فقط، مقاول سباكة او كهرباء او تكييف او لياسة او (العزل او الجبس او الدهان او اعمال الديكورات الداخلية) - شركات التشغيل او شركات الصيانة وشركات الخدمات الجانبية مثل شركات ترحيل المخلفات وشركات مكافحة الأفات، جميع أنواع الموردين بمختلف المواد. كلهم شركاء نجاح
                        </p>
                        <a className="btn btn-md mt-5 " href="https://consulting.ko-sky.net/join" target={"_blank"}>
                            للانضمام إلينا في برنامج شركاء النجاح تقدم بطلبك الان
                        </a>
                    </div>
                </div>
            </div>
            <OneSection />
            {/*<ThreeImages />*/}

            {/* <FlavorsList2 /> */}
        </AppLayout>
    );
};

export default AboutUs;
