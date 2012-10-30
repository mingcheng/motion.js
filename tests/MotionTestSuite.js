// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * MotionTestSuite
 *
 * @author mingcheng@taobao.com
 * @date   2009-03-30
 * @link   http://www.gracecode.com/
 * 
 * assertTrue
 * assertFalse
 * assertEqual
 * assertNotEqual
 * assertNull
 * assertNotNull
 * assertUndefined
 * assertNotUndefined
 * assertNaN
 * assertNotNaN
 */

// 全局测试语句
jsUnity.attachAssertions(window);

// 测试动画方程式
var MotionTweens = { suiteName: 'MotionTweens' }; 

var Tweens = Motion.getTweens();
for (var i in Tweens) {
    (function () {
        MotionTweens['test' + i.replace(/^[a-z]{1}/, function(c){return c.toUpperCase()})] = function() {
            var duration = 2000, frames = Math.ceil((duration/1000)*35);
            var from = 0, to = 1000, current = 1, result = 0;
            while (current++ < frames) {
                result = Tweens[i]((current/frames)*duration, from, to - from, duration);
            }
            assertEqual(1000, result);
        }
    })();
}
