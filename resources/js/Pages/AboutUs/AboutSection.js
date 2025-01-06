import React from "react";
import {TwoSectionSubTitle, TwoSectionText, TwoSectionTitle} from "@/Components/TwoSection";
import {Link} from "@inertiajs/inertia-react";
const AboutSection = ({ reverse = false, children }) => {
    return (
        <div>
            <div className="mx-auto">
                <div
                    className={
                        "flex flex-col-reverse items-stretch  " +
                        (reverse ? "lg:flex-row-reverse" : "lg:flex-row")
                    }
                >

                    <div className="w-full lg:w-1/3 ">
                        <div className="py-section px-10 md:px-36 lg:px-16">
                            <div className="text-center">
                                <TwoSectionSubTitle className="mb-1">
                                     رؤيتنا
                                </TwoSectionSubTitle>
                                <div className="text-center max-w-lg mx-auto">
                                    <TwoSectionText>

                                        نستمد رؤيتنا من رؤية المملكة العربية السعودية 2030 وبرنامج التحول الرقمي ، حيث تعتمد شركة منصة اعمار ، على دراسة وتطوير رحلة الانسان في مجال البناء والعمار من مرحلة البحث عن الأرض الى اختيار الأرض وفق متطلباته، الى اختبار التربة الى المخططات وصولاً الى قطاع المقاولات وتنفيذ المشاريع عبر ربط جميع الأطراف بمختلف التخصصات في ببرنامج واحد وقاعدة بيانات موحده معتمدين على استخدام البرمجيات التقنية والذكاء الاصطناعي، لتسهيل جميع الإجراءات للإنسان وهنا يمكن سر اختيار الاسم لبرنامج منصة إعمار، لتصبح منصة تشاركية تقدم الخدمة للعميل الراغب بالبناء وللشركات المنفذة ذات الشأن بالمجال
                                    </TwoSectionText>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div className="w-full lg:w-1/3 ">
                        <div className="py-section px-10 md:px-36 lg:px-16">
                            <div className="text-center">
                                <TwoSectionSubTitle className="mb-1">
                                     الاقتصاد التشاركي
                                </TwoSectionSubTitle>
                                <div className="text-center max-w-lg mx-auto">
                                    <TwoSectionText>

                                        تعتمد منصة اعمار في برنامج منصة إعمار على نظام الاقتصاد التشاركي والتي تعتمد على تقديم الخدمات الاحترافية عبر مزود الخدمة بطريقة أكثر فعالية كما يتم صناعة الفرصة التجارية ليستفيد جميع الأطراف وتعتمد هذه العمليات على اتفاقات قانونية مع شركاء النجاح تنص على نظام انتاج الخدمة وفق النظام القانوني الصادر من الجهات ذات الاختصاص، وبتوصيف دقيق عن الخدمة واليتها بالمقابل يتم استعراض جميع خدمات شركاء النجاح في المنصة
                                    </TwoSectionText>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div className="w-full lg:w-1/3 ">
                        <div className="py-section px-10 md:px-36 lg:px-16">
                            <div className="text-center">
                                <TwoSectionSubTitle className="mb-1">
                                    شركاء النجاح
                                </TwoSectionSubTitle>
                                <div className="text-center max-w-lg mx-auto">
                                    <TwoSectionText>

                                        شركاء النجاح هو مصطلح يطلق على كل كيان تجاري مختص يقدم خدماتة لمجال البناء والعمار ويستهدف هذا القطاع والتي تعد خدماتها متطلب أساسي لبناء المشاريع السكنية او السياحية  كالتالي

                                        ملاك العقار والاراضي -

                                        مكاتب المساحة -

                                        مخترات التربة -

                                        المكاتب الاستشارية بجميع خدماتها -  مخططات واشراف هندسي -

                                        شركات المقاولات العامة المصنفة او   المعتمدة لدى هيئة المقاولين-

                                        مؤسسات المقاولات المختصة مثل (مقاول عظم فقط، مقاول سباكة او كهرباء او تكييف او لياسة او تنفيذ اعمال محدد مثل (العزل او الجبس او الدهان او اعمال الديكورات الداخلية) -

                                        شركات التشغيل او شركات الصيانة وشركات الخدمات الجانبية مثل شركات ترحيل المخلفات وشركات مكافحة
                                    </TwoSectionText>
                                    <a className="btn btn-md " href="https://consulting.ko-sky.net/join" target={"_blank"}>
                                        للانضمام إلينا في برنامج شركاء النجاح تقدم بطلبك الان
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default AboutSection;

